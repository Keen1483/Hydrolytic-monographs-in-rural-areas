/*jslint  browser: true, white: true, plusplus: true */
/*global $, regions */

$(function () {

    if (document.getElementById('formAep')) {
        'use strict';

        var regionsArray = $.map(regions, function (value, key) { return { value: value, data: key }; });

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
        $('.autocomplete-region').autocomplete({
            // serviceUrl: '/autosuggest/service/url',
            lookup: regionsArray,
            lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
                var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
                return re.test(suggestion.value);
            },
            onHint: function (hint) {
                $('#autocomplete-ajax-x').val(hint);
                $('.autocomplete-region').change(function (e) { 
                    e.preventDefault();
                    setTimeout(function(){
                        $('.autocomplete-region').val($('.autocomplete-region').val());
                    }, 400);
                });
            }
        });

        // Functions
        const capitalize = (s) => {
            if (typeof s !== 'string') return ''
            return s.charAt(0).toUpperCase() + s.slice(1)
        }

        function swapJsonKeyValues(input) {
            var one, output = {};
            for (one in input) {
                if (input.hasOwnProperty(one)) {
                    output[input[one]] = one;
                }
            }
            return output;
        }


        //departments
        var region = '', regionsAbbrs = '', region_code = '';
        $('.autocomplete-region').change(function (e) { 
            e.preventDefault();

            setTimeout(function(){
                region = $('.autocomplete-region').val();
                region = capitalize(region);
            
                regionsAbbrs = swapJsonKeyValues(regions);

                region_code = regionsAbbrs[region];
                region_code = region_code.toLowerCase();

                region_code = window[region_code];

                var departmentsArray = $.map(region_code, function (value, key) { return { value: value, data: key }; });

                // Setup jQuery ajax mock:
                $.mockjax({
                    url: '*',
                    responseTime: 2000,
                    response: function (settings) {
                        var query = settings.data.query,
                            queryLowerCase = query.toLowerCase(),
                            re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
                            suggestions = $.grep(departmentsArray, function (country) {
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

                // Initialize ajax autocomplete department:
                $('.autocomplete-department').autocomplete({
                    // serviceUrl: '/autosuggest/service/url',
                    lookup: departmentsArray,
                    lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
                        var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
                        return re.test(suggestion.value);
                    },
                    onHint: function (hint) {
                        $('#autocomplete-ajax-z').val(hint);
                        $('.autocomplete-department').change(function (e) { 
                            e.preventDefault();
                            setTimeout(function(){
                                $('.autocomplete-department').val($('.autocomplete-department').val());
                            }, 400);
                        });
                    }
                });
            }, 500);
        });

        //boroughs
        $('.autocomplete-department').change(function (e) { 
            e.preventDefault();
            
            setTimeout(function() {
                
                let departmentsAbbrs = swapJsonKeyValues(region_code);
                
                let department = $('.autocomplete-department').val();
                department = capitalize(department);

                let department_code = departmentsAbbrs[department];
                department_code = department_code.toLowerCase();
                department_code = window[department_code];

                var boroughsArray = $.map(department_code, function (value, key) { return { value: value, data: key }; });

                // Setup jQuery ajax mock:
                $.mockjax({
                    url: '*',
                    responseTime: 2000,
                    response: function (settings) {
                        var query = settings.data.query,
                            queryLowerCase = query.toLowerCase(),
                            re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi'),
                            suggestions = $.grep(boroughsArray, function (country) {
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

                // Initialize ajax autocomplete department:
                $('.autocomplete-borough').autocomplete({
                    // serviceUrl: '/autosuggest/service/url',
                    lookup: boroughsArray,
                    lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
                        var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
                        return re.test(suggestion.value);
                    },
                    onHint: function (hint) {
                        $('#autocomplete-ajax-y').val(hint);
                    }
                });
            }, 500);
        });
    }
    
});