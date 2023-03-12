$(function () {
    if (document.getElementById('aep-list')) {
        $('.autocomplete-search').css('z-index', 2).css('background', 'transparent');
        $('.autocomplete-search').css('position', 'absolute');
        $('.autocomplete-search').on('focus', function(event) {
            $.ajax({
                type: "POST",
                dataType: "json",
                
                success: function(dataAep, status) {
                    'use strict';

                    let aepInfos = {},
                        k = 1;
                    for (let i = 0; i < dataAep.length; i++) {
                        for (const key in dataAep[i]) {
                            if (dataAep[i].hasOwnProperty(key)) {
                                aepInfos[k + '_' + key] = dataAep[i][key];
                                k++;
                            }
                        }
                    }
                    console.log(aepInfos);
                    var aepDataArray = $.map(aepInfos, function (value, key) { return { value: value, data: key }; });
                    
                    // Setup jQuery ajax mock:
                    $.mockjax({
                        url: '*',
                        responseTime: 2000,
                        response: function (settings) {
                            var query = settings.data.query,
                                queryLowerCase = query.toLowerCase(),
                                re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
                                suggestions = $.grep(regionsArray, function (country) {
                                    // return country.value.toLowerCase().indexOf(queryLowerCase) === 0;
                                    return re.test(country.value);
                                }),
                                response = {
                                    query: query,
                                    suggestions: suggestions
                                };

                            this.responseText = JSON.stringify(response);
                        }
                    });

                    // Initialize ajax autocomplete regions:
                    $('.autocomplete-search').autocomplete({
                        // serviceUrl: '/autosuggest/service/url',
                        lookup: aepDataArray,
                        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
                            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
                            return re.test(suggestion.value);
                        },
                        onHint: function (hint) {
                            $('#autocomplete-ajax-search').val(hint);
                            $('.autocomplete-search').change(function (e) {
                                e.preventDefault();
                                
                                setTimeout(function () {
                                    $('.autocomplete-search').val($('.autocomplete-search').val());
                                    function getKeyByValue(object, value) {
                                        return Object.keys(object).find(key => object[key] === value);
                                    }
                                    let keyInfos = getKeyByValue(aepInfos, $('.autocomplete-search').val());
                                    if (/^\d+_(.+)_(.+)$/.exec(keyInfos)) {
                                        console.log(keyInfos);
                                        document.getElementById('form_property').value = RegExp.$1;
                                        document.getElementById('form_entity').value = RegExp.$2;
                                    }
                                    
                                }, 400);
                            });
                            
                            $(':submit').click(function (e) { 
                                e.preventDefault();
                                console.log($('#form_value').val(), $('.property').val(), $('.entity').val());
                                setTimeout(function() {
                                    $(':input')
                                    .not(':submit, :reset')
                                    .val('');
                                }, 400);
                            });
                        }
                    });
                },  
                error: function(xhr, textStatus, errorThrown) {  
                    alert('AEP search failed.');
                }
            });
        });
    }
});