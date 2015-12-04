// OPTIONS (in an options object you can set the following)
	// initurl - the URL to be used for getting the initial field data.
	// submiturl - the URL to be used for submitting the search & returning formatted results from.
	// buttontext - string for the search button text

// NOTE: The initialize should be invoked on a FORM element.

// initialize the variables we will be using. Some values are set in the initAdvSearch function.
var locOptions = {},
	fields;

$.fn.locatorSearch = function(options) {
	var options = options || false;
	
	return this.each(function() {
		var target = this, // a pointer to the form this is being placed into
			htmlFields = '',
			htmlAndOr = '<select name="center[]"><option value=""></option><option value="and">and</option><option value="or">or</option><option value="and not">and not</option></select>';

		// Defaults
		locOptions.initurl = 'locator-search.php';
		if ($(target).attr('action') != 'undefined'){
			locOptions.submiturl = $(target).attr('action');
		}
		else {
			locOptions.submiturl = 'locator-search.php';
		}
		locOptions.buttontext = 'Search';
		locOptions.inactivepeople = false;

		if(typeof options == 'object') {
			for(key in options) {
				if(key.toLowerCase() == 'initurl') {
					locOptions.initurl = options[key];
				}
				if(key.toLowerCase() == 'submiturl') {
					locOptions.submiturl = options[key];
				}
				if(key.toLowerCase() == 'buttontext') {
					locOptions.buttontext = options[key];
				}
			}
		}

		//fetch the initial state data
		$.ajax({
			type: 'post',
			url: locOptions.initurl,
			dataType: 'json',
			data: {
				q: 'initThis'
			}
		})
		.done(function(data){
			if (typeof data.error !== 'undefined'){
				alert('Sorry, There was an error trying to initialize the advanced search: '+data.error);
			}
			else {
				fields = data.success;
				console.log(fields);

				// Build the HTML to be re-used for each row
				// We do not have the wrapper fieldset or div here b/c the classes will vary when rows are added later
				htmlFields = '<select name="FIELD[]">';
				fields.forEach(function(e){
					htmlFields += '<option value="'+e.name+'">'+e.name+'</option>';
				});
				htmlFields += '</select><select name="LIMIT[]">';
				for (var key in fields) {
					if (key == 0){
						for (var subkey in fields[key].limitType) {
							htmlFields += '<option value="'+fields[key].limitType[subkey]+'">'+fields[key].limitType[subkey]+'</option>';
						}
					}
				}
				htmlFields += '</select><input type="text" size="20" name="SEARCH[]">';

				// Output the HTML
				var html = '<div class="advancedLocatorSearchBox">';
				html += '<div id="criteriaGroup" class="criteriaGroup"><fieldset class="criteria top bottom">';
				html += htmlFields;
				html += '</fieldset><div class="andOr text-center">';
				html += htmlAndOr;
				html +='</div></div><div class="text-center"><input type="submit" name="SUBMIT" class="btn btn-success btn-gradient" value="'+locOptions.buttontext+'"></div>';
				html += '</div>';

				$(target).html(html);
			}
		}).fail(function(jqXHR, textStatus){
			alert('Sorry, There was an error trying to initialize the advanced search: '+textStatus);
		});

		$(target).on('change', '.andOr select', function(){
			addNewRow(this);
		});
		$(target).on('change', 'select[name="FIELD[]"]', function(){
			updateLimits(this);
		});

		function addNewRow(changedTarget){
			var selected = changedTarget.value;
			var parentTarget = $(changedTarget).parent();
			var newHTML = '';
			// updateRow is a flag for determining if this select was previously used to insert a new row
			var updateRow = $(parentTarget).next().hasClass('criteria');
			switch(selected) {
				case '':
					$(parentTarget).nextAll('fieldset.criteria').remove();
					$(parentTarget).nextAll('div.andOr').remove();
					$(parentTarget).removeClass('solidBackground').prev().addClass('bottom');
				break;
				case 'or':
					if (!updateRow){
						newHTML = '<fieldset class="criteria top bottom">';
						newHTML += htmlFields;
						newHTML += '</fieldset><div class="andOr text-center">';
						newHTML += htmlAndOr;
						newHTML +='</div></div>';
						$(parentTarget).after(newHTML);
					}
					else {
						$(parentTarget).removeClass('solidBackground').prev().addClass('bottom').next().next().addClass('top');
					}
				break;
				case 'and':
				case 'and not':
					if (!updateRow){
						$(parentTarget).addClass('solidBackground').prev().removeClass('bottom');
						newHTML = '<fieldset class="criteria bottom solidBackground">';
						newHTML += htmlFields;
						newHTML += '</fieldset><div class="andOr text-center">';
						newHTML += htmlAndOr;
						newHTML +='</div></div>';
						$(parentTarget).after(newHTML);
					}
					else {
						$(parentTarget).addClass('solidBackground').next().removeClass('top').prev().prev().removeClass('bottom');
					}
				break;
			}
		}

		function updateLimits(changedField){
			var newField = changedField.value;
			var targetParent = $(newField).parent();

			for (var key in fields) {
				if (fields[key].name == newField){
					// Build new LIMITS options list & inject it
					var newLimits = '';
					for (var subkey in fields[key].limitType) {
						newLimits += '<option value="'+fields[key].limitType[subkey]+'">'+fields[key].limitType[subkey]+'</option>';
					}
					$(changedField).next().empty().html(newLimits);

					//Check the inputType for text or array & update as needed
					if (typeof(fields[key].inputType) == 'string'){
						if (typeof($(changedField).next().next().attr('type')) == 'undefined' || $(changedField).next().next().attr('type') != 'text'){
							$(changedField).next().next().after('<input type="text" size="20" name="SEARCH[]">').remove();
						}
					}
					else {
						$(changedField).next().next().remove();
						var newSelect = '<select class="wide" name="SEARCH[]">';
						for (var subkey in fields[key].inputType) {
							//console.log(typeof(fields[key].inputType[subkey]));
							if (typeof(fields[key].inputType[subkey]) == 'object'){
								newSelect += '<option value="'+fields[key].inputType[subkey].value+'">'+fields[key].inputType[subkey].display+'</option>';
							}
							else {
								newSelect += '<option value="'+fields[key].inputType[subkey]+'">'+fields[key].inputType[subkey]+'</option>';
							}
						}
						newSelect += '</select>';
						$(changedField).next().after(newSelect);
					}
				}
			}
		}
		
		$(target).submit(function(e){
			e.preventDefault();
			var submitData = $(this).serializeArray();
			var targetID = $(target).attr('id');
			console.log(locOptions.submiturl);

			//submit the data & display the HTML results
			$.ajax({
				type: 'post',
				url: locOptions.submiturl,
				dataType: 'json',
				data: {
					searchArray: submitData
				},
				beforeSend: function(){
					
					var test = $('.advancedWrapper[for="'+targetID+'"]');
					console.log(targetID);
					console.log(test);
					$('.advancedWrapper[for="'+targetID+'"]').addClass('ajax-active');
				}
			})
			.done(function(data){
				if (typeof data.error !== 'undefined'){
					alert('Sorry, There was an error trying to search: '+data.error);
				}
				else {
					$('.advSearchResults[for="'+targetID+'"]').html(data.success);
				}
				$('.advancedWrapper[for="'+targetID+'"]').removeClass('ajax-active');
			})
			.fail(function(jqXHR, textStatus){
				alert('Sorry, There was an error trying to search: '+textStatus);
				$('.advancedWrapper[for="'+targetID+'"]').removeClass('ajax-active');
			});
			
		});
		
	});
}