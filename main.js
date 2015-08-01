var publicKey = 'tsekmdgq9oe26i5fh1kd389p19';
var secretKey = 'j7vu507a1ht594a1t6vrqek4d5';
var assessmentId;
//var assessmentId2 = '56933ffd-866d-43fe-9e31-22bd081e511c';

Traitify.setPublicKey(publicKey);
Traitify.setHost("https://api-sandbox.traitify.com");
Traitify.setVersion("v1");

function apiCall(method, key, url, data, responseHandler) {
  var httpRequest = new XMLHttpRequest();

  function requestCheck() {
    if (httpRequest.readyState === 4) {
      if (httpRequest.status === 200 || httpRequest.status === 201) {
        responseHandler(JSON.parse(httpRequest.responseText));
      }
      else {
        alert('Request Status: ' + httpRequest.status);
      }
    }
  }

  httpRequest.onreadystatechange = requestCheck;

  httpRequest.open(method, url, true);
  httpRequest.setRequestHeader('Authorization', 'Basic ' + key + ":x");
  httpRequest.send(data);
}

function consolePretty(object) {
  console.log(JSON.stringify(object, null, '\t'));
}

function codePretty(object) {
  return "<pre>" + JSON.stringify(object, null, '\t') + "</pre>";
}

function createAssessment() {
  apiCall('POST', secretKey, 'https://api-sandbox.traitify.com/v1/assessments',
    "{\"deck_id\":\"career-deck\"}", assessmentHandler
  );
}

function assessmentHandler(data) {

  assessmentId = data.id;

  //document.getElementById('assessmentJSON').innerHTML = codePretty(data);

  var slideDeckWidget = Traitify.ui.load("slideDeck", assessmentId, "#slideDeck");

  slideDeckWidget.onFinished(function() {
    showCareers(assessmentId);
  });

}

//formats the career output
function showCareers(id) {
  //var careersJSON = document.getElementById("careersJSON");
  var trHTML;
  Traitify.getCareers(id).then(function(data){
    //careersJSON.innerHTML = codePretty(data);
    trHTML = '<table class="table">';
    trHTML += '<tr><td colspan="2"><strong>Career Options<strong></td></tr>';
    console.log(data);
    for(var i=0; i<data.length; i++){
      trHTML += '<tr><td align="center"><strong>' + data[i].career.title + '<strong><br><img src="'+ data[i].career.picture +'"></td>';
      trHTML += '<td><i>Score:</i> ' + data[i].score + '<br><br><i>Description:</i> ' + data[i].career.description + '<br><br><i>College Major Choices:</i> ';

      for(var j=0; j<data[i].career.majors.length; j++){
        trHTML += data[i].career.majors[j].title + ' ';
      }
      trHTML += '<br><br><i>Personality Traits: </i>';
      for(var k=0; k<data[i].career.personality_traits.length; k++){
        trHTML += data[i].career.personality_traits[k].personality_trait.name + '. ';
      }

      trHTML += '<br><br><i>Salary Mean:</i> $' + numberWithCommas(data[i].career.salary_projection.annual_salary_mean) +'';

      trHTML += '</td></tr>';
    }
    trHTML += '</table>';
    var careersJSON = document.getElementById("careersJSON");
    careersJSON.innerHTML = trHTML;
  });
}

//formats the salary number
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}


window.onload = function() {

  createAssessment();

};



/*

{
  "id": "56933ffd-866d-43fe-9e31-22bd081e511c",
  "deck_id": "career-deck",
  "tags": null,
  "completed_at": null,
  "created_at": 1438440459641
}

*/