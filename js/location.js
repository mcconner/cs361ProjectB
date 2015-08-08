    function getLocationRequirements() {
        var userLocation1 = $('#userLocation1').val();
        var userLocation2 = $('#userLocation2').val();
        var userLocation3 = $('#userLocation3').val();
        console.log(userLocation1 + ' ' + userLocation2 + ' ' + userLocation3);
        //alert("In function");
       $.ajax({
            headers: { "Accept": "application/json"},
            type: 'GET',
            dataType: 'json',
            url: 'fiscal_data.php?location=' + userLocation1,
            success: function(data, textStatus, request){
                
                $.ajax({
            headers: { "Accept": "application/json"},
            type: 'GET',
            dataType: 'json',
            url: 'fiscal_data.php?location=' + userLocation2,
            success: function(data2, textStatus, request){

                console.log(data2);

                $.ajax({
                    headers: { "Accept": "application/json"},
                    type: 'GET',
                    dataType: 'json',
                    url: 'fiscal_data.php?location=' + userLocation3,
                    success: function(data3, textStatus, request){

                        console.log(data3);

                        function dataTest(input){
                            if(typeof input === 'undefined'){
                                return "No Data";

                            } else {
                                return input.toFixed(2);
                            }
                        }


                        var trHTML = '<table class="table">';
                        trHTML += '<tr><td></td><td>'+ data.name +'</td><td>'+ data2.name+'</td><td>'+ data3.name +'</td></tr>';
                        trHTML += '<tr><td>CPI and rent index</td><td>'+ dataTest(data.cpi_and_rent_index) +'</td><td>'+ dataTest(data2.cpi_and_rent_index) +'</td><td>'+ dataTest(data3.cpi_and_rent_index) +'</td></tr>'; 
                        trHTML += '<tr><td>Restaurant index</td><td>'+ dataTest(data.restaurant_price_index) +'</td><td>'+ dataTest(data2.restaurant_price_index) +'</td><td>'+ dataTest(data3.restaurant_price_index) +'</td></tr>'; 
                        trHTML += '<tr><td>Quality of life index</td><td>'+ dataTest(data.quality_of_life_index) +'</td><td>'+ dataTest(data2.quality_of_life_index) +'</td><td>'+ dataTest(data3.quality_of_life_index) +'</td></tr>'; 
                        trHTML += '<tr><td>Safety index</td><td>'+ dataTest(data.safety_index) +'</td><td>'+ dataTest(data2.safety_index) +'</td><td>'+ dataTest(data3.safety_index) +'</td></tr>'; 
                        trHTML += '</table>';
                        var locationInfo = document.getElementById("locationData");
                        locationInfo.innerHTML = trHTML; 
                    }
            }); 


            }
        }); 


                /*var trHTML = '<table class="table">';
                trHTML += '<tr><td colspan="2">'+ data.name +'</td></tr>';
                trHTML += '<tr><td>CPI and rent index</td><td>'+ (data.cpi_and_rent_index.toFixed(2)) +'</td></tr>'; 
                trHTML += '<tr><td>Restaurant index</td><td>'+ (data.restaurant_price_index).toFixed(2) +'</td></tr>'; 
                trHTML += '<tr><td>Quality of life index</td><td>'+ (data.quality_of_life_index).toFixed(2) +'</td></tr>'; 
                trHTML += '<tr><td>Safety index</td><td>'+ (data.safety_index).toFixed(2) +'</td></tr>'; 
                trHTML += '</table>';
                var locationInfo = document.getElementById("locationData");
                locationInfo.innerHTML = trHTML;*/
            }
        }); 
	return false;
    }
    /*function getLocationRequirements() {
    var userLocation1 = $('#userLocation1').val();
    var userLocation2 = $('#userLocation2').val();
    var userLocation3 = $('#userLocation3').val();
    console.log(userLocation1 + ' ' + userLocation2 + ' ' + userLocation3);
    alert("in function");
    $.when(
        $.ajax({
            headers: { "Accept": "application/json"},
            type: 'GET',
            dataType: 'json',
            //url: 'fiscal_data.php?location=San+Francisco',
            url: 'fiscal_data.php?location=' + userLocation1
        }),
        $.ajax({
            headers: { "Accept": "application/json"},
            type: 'GET',
            dataType: 'json',
            //url: 'fiscal_data.php?location=San+Francisco',
            url: 'fiscal_data.php?location=' + userLocation2
        }),
        $.ajax({
            headers: { "Accept": "application/json"},
            type: 'GET',
            dataType: 'json',
            //url: 'fiscal_data.php?location=San+Francisco',
            url: 'fiscal_data.php?location=' + userLocation3
        })
    ).done(function(L1, L2, L3 ) {
            console.log(L1[0].cpi_and_rent_index);
            console.log(L2[0].cpi_and_rent_index); 
            console.log(L3[0].cpi_and_rent_index); 


            var trHTML = '<table class="table">';
                trHTML += '<tr><td></td><td>'+ L1[0].name +'</td><td>'+ L2[0].name+'</td><td>'+ L3[0].name +'</td></tr>';
                trHTML += '<tr><td>CPI and rent index</td><td>'+ (L1[0].cpi_and_rent_index.toFixed(2)) +'</td><td>'+ (L2[0].cpi_and_rent_index.toFixed(2)) +'</td><td>'+ (L3[0].cpi_and_rent_index.toFixed(2)) +'</td></tr>'; 
                trHTML += '<tr><td>Restaurant index</td><td>'+ (L1[0].restaurant_price_index).toFixed(2) +'</td><td>'+ (L2[0].restaurant_price_index).toFixed(2) +'</td><td>'+ (L3[0].restaurant_price_index).toFixed(2) +'</td></tr>'; 
                trHTML += '<tr><td>Quality of life index</td><td>'+ (L1[0].quality_of_life_index).toFixed(2) +'</td><td>'+ (L2[0].quality_of_life_index).toFixed(2) +'</td><td>'+ (L3[0].quality_of_life_index).toFixed(2) +'</td></tr>'; 
                trHTML += '<tr><td>Safety index</td><td>'+ (L1[0].safety_index).toFixed(2) +'</td><td>'+ (L2[0].safety_index).toFixed(2) +'</td><td>'+ (L3[0].safety_index).toFixed(2) +'</td></tr>'; 
                trHTML += '</table>';
                var locationInfo = document.getElementById("locationData");
                locationInfo.innerHTML = trHTML;    
    });
}*/
