// jQuery toggle & Steps
$(document).ready(function() {
  $('#step1').click(function() {
    $('#step1form').toggle('fold');
  });
});
$(document).ready(function() {
  $('#step2').click(function() {
    if ($('#step1').text() === 'Completed') {
      $('#step2form').toggle('fold');
    } else {
      alert('Please complete the former steps before you can start this one.');
    }
  });
});
$(document).ready(function() {
  $('#step3').click(function() {
    if ($('#step1').text() === 'Completed' && $('#step2').text() === 'Completed') {
      $('#step3form').toggle('fold');
    } else {
      alert('Please complete the former steps before you can start this one.');
    }
  });
});

// Step 1
var clientName = {};

$(document).ready(function() {
  $('#NameButton').click(function() {
    if ($('#Name').val() !== '') {
      clientName.clientName = $('#Name').val();
      $('#NameBox').html('<center style="font-size:30;">Welcome <b><u><i>' + clientName.clientName + '</b></u></i>!</center>');
      if (!$('#step1form').is(':visible')) {
        $('#step1form').toggle('fold');
      }
    } else {
      alert('Please enter a name');
    }
  });
});

var sitenameArray = {};

$(document).ready(function() {
  $('#Step1Submit').click(function() {
    sitenameArray.Site1Name = $('#Site1').val();
    sitenameArray.Site2Name = $('#Site2').val();
    sitenameArray.Site3Name = $('#Site3').val();
    sitenameArray.Site4Name = $('#Site4').val();
    sitenameArray.Site5Name = $('#Site5').val();

    if (
      sitenameArray.Site1Name === '' ||
      sitenameArray.Site2Name === '' ||
      sitenameArray.Site3Name === '' ||
      sitenameArray.Site4Name === '' ||
      sitenameArray.Site5Name === ''
    ) {
      $('#step1box').attr('style', 'background-color:IndianRed');
      $('#step1').html('Step 1 Incomplete');
    } else {
      $('#step1form').slideToggle('slow');
      $('#step1box').attr('style', 'background-color:lightgreen');
      $('#step1').html('Completed');
      $('#step1').unbind('click');
      $('#Site1Desc').html(sitenameArray.Site1Name + ':');
      $('#Site2Desc').html(sitenameArray.Site2Name + ':');
      $('#Site3Desc').html(sitenameArray.Site3Name + ':');
      $('#Site4Desc').html(sitenameArray.Site4Name + ':');
      $('#Site5Desc').html(sitenameArray.Site5Name + ':');
      $('#step2form').slideToggle('slow');
    }
  });
});

// Step 2
var descArray = {};

$(document).ready(function() {
  $('#Step2Submit').click(function() {
    descArray.Site1Description = $('#Site1TextArea').val();
    descArray.Site2Description = $('#Site2TextArea').val();
    descArray.Site3Description = $('#Site3TextArea').val();
    descArray.Site4Description = $('#Site4TextArea').val();
    descArray.Site5Description = $('#Site5TextArea').val();

    if (
      descArray.site1 === '' ||
      descArray.site2 === '' ||
      descArray.site3 === '' ||
      descArray.site4 === '' ||
      descArray.site5 === ''
    ) {
      $('#step2box').attr('style', 'background-color:IndianRed');
      $('#step2').html('Step 2 Incomplete');
    } else {
      $('#step2form').slideToggle('slow');
      $('#step2box').attr('style', 'background-color:lightgreen');
      $('#step2').html('Completed');
      $('#step2').unbind('click');
      $('#Site1UploadPhotoLbl').html(sitenameArray.Site1Name + ' Photo:');
      $('#Site2UploadPhotoLbl').html(sitenameArray.Site2Name + ' Photo:');
      $('#Site3UploadPhotoLbl').html(sitenameArray.Site3Name + ' Photo:');
      $('#Site4UploadPhotoLbl').html(sitenameArray.Site4Name + ' Photo:');
      $('#Site5UploadPhotoLbl').html(sitenameArray.Site5Name + ' Photo:');
      $('#step3form').slideToggle('slow');
    }
  });
});

// Step 3
var imageArray = {};

$(document).ready(function() {
  $('#uploadPhotosForm').on('submit', function(e) {
    e.preventDefault();
    $('#step3').html('Step 3 - Uploading Images');
    $('#step3box').attr('style', 'background-color:orange');
    $.ajax({
      url: 'imagesSubmit.php',
      type: 'POST',
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        if (data === 'error') {
          $('#step3box').attr('style', 'background-color:IndianRed');
          $('#step3').html('Step 3 - Incomplete');
        } else {
          imageArray = $.parseJSON(data);
          $('#step3form').slideToggle('slow');
          $('#step3box').attr('style', 'background-color:lightgreen');
          $('#step3').html('Completed');
          $('#step3').unbind('click');
          $('#SubmitDiv').show();
        }
      }
    });
  });
});

//Submit

$(document).ready(function() {
  $('#Submit').click(function() {
    var CombinedData = $.extend({}, clientName, sitenameArray, descArray, imageArray);
    var tmp = JSON.stringify(CombinedData);

    $.post('SiteBuilder.php', { data: tmp }, function(data) {});
    $('#SubmitDiv').hide();
    $('#GotoDiv').show();
  });
});
