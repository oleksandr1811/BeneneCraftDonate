$( document ).ready(function() {

  var lastCommand = "";

  $("#txtCommand").bind("enterKey",function(e){
    lastCommand = $("#txtCommand").val();
    sendCommand(lastCommand);
  });

  $("#txtCommand").keyup(function(e){
    if(e.keyCode == 13)
    {
      $(this).trigger("enterKey");
      $(this).val("");
    }
    if(e.keyCode == 38)
    {
      $(this).val(lastCommand);
    }
  });

  $( "#btnSend" ).click(function() {
    if($("#txtCommand").val() != "") $("#btnSend").prop('disabled', true);
    sendCommand($("#txtCommand").val());
    scrollLogsDown();
  });

  $( "#btnClearLog" ).click(function() {
    $("#groupConsole").empty();
    alertInfo("Консоль очищена.");
  });

});

function logSuccess(log)
{
  datetime = getCurrentTime();
  datetime += " ⇦ ";
  var fullLog = datetime + log;
  $("#groupConsole").append('<li class="list-group-item list-group-item-success">' + fullLog + '</li>');
  $("#btnSend").prop('disabled', false);
  clearOldLogs();
}

function logInfo(log)
{
  datetime = getCurrentTime();
  datetime += " ⇦ ";
  var fullLog = datetime + log;
  $("#groupConsole").append('<li class="list-group-item list-group-item-info">' + fullLog + '</li>');
  $("#btnSend").prop('disabled', false);
  clearOldLogs();
}

function logWarning(log)
{
  datetime = getCurrentTime();
  datetime += " ⇦ ";
  var fullLog = datetime + log;
  $("#groupConsole").append('<li class="list-group-item list-group-item-warning">' + fullLog + '</li>');
  $("#btnSend").prop('disabled', false);
  clearOldLogs();
}

function logDenger(log)
{
  datetime = getCurrentTime();
  datetime += " ⇦ ";
  var fullLog = datetime + log;
  $("#groupConsole").append('<li class="list-group-item list-group-item-danger">' + fullLog + '</li>');
  $("#btnSend").prop('disabled', false);
  clearOldLogs();
}


function alertSuccess(messenge)
{
  $( "#alertMessenge" ).fadeOut( "slow", function() {
    $("#alertMessenge").attr('class', 'alert alert-success');
    $("#alertMessenge").html(messenge);
    $( "#alertMessenge" ).fadeIn( "slow", function() {

    });
  });
}

function alertInfo(messenge)
{
  $( "#alertMessenge" ).fadeOut( "slow", function() {
    $("#alertMessenge").attr('class', 'alert alert-info');
    $("#alertMessenge").html(messenge);
    $( "#alertMessenge" ).fadeIn( "slow", function() {

    });
  });
}

function alertWarning(messenge)
{
  $( "#alertMessenge" ).fadeOut( "slow", function() {
    $("#alertMessenge").attr('class', 'alert alert-warning');
    $("#alertMessenge").html(messenge);
    $( "#alertMessenge" ).fadeIn( "slow", function() {

    });
  });
}

function alertDenger(messenge)
{
  $( "#alertMessenge" ).fadeOut( "slow", function() {
    $("#alertMessenge").attr('class', 'alert alert-danger');
    $("#alertMessenge").html(messenge);
    $( "#alertMessenge" ).fadeIn( "slow", function() {
    });
  });
}

function sendCommand(command)
{
  if (command == "") {alertDenger("Введите команду."); return;}
  var datetime = getCurrentTime();
  datetime += " ⇨ ";
  datetime += command;

  $("#groupConsole").append('<li class="list-group-item list-group-item-success">' + datetime + '</li>');
  clearOldLogs();
  $.post( "rcon/index.php", { cmd: command}) .done(function( data ) {
    if(data.indexOf("Unknown command") != -1)
    {
      alertDenger("Неизвестная команда.");
      logDenger(data);
      clearOldLogs();
      scrollLogsDown();
      return;
    }
    else if(data.indexOf("Usage") != -1)
    {
      alertWarning(data);
      logWarning(data);
      scrollLogsDown();
      return;
    }
    alertSuccess("Успешно отправлено!");
    datetime = getCurrentTime();
    datetime += " ⇦ ";
    datetime += data;
    $("#groupConsole").append('<li class="list-group-item list-group-item-info">' + datetime + '</li>');
    $("#btnSend").prop('disabled', false);
    clearOldLogs();
    scrollLogsDown();
  }).fail(function() {
    alertDenger("Error!");
    datetime = getCurrentTime();
    datetime += " ⇦ ";
    datetime += "Error!";
    $("#groupConsole").append('<li class="list-group-item list-group-item-danger">' + datetime + '</li>');
    $("#btnSend").prop('disabled', false);
    clearOldLogs();
    scrollLogsDown();
  });
  scrollLogsDown();
}

function clearOldLogs()
{
  var logItemSize = $("#groupConsole li").size();
  if(logItemSize > 50) {
    $('#groupConsole li:first').remove();
  }
}

function scrollLogsDown(){
  $("#consoleContent .panel-body").scrollTop($("#groupConsole").get(0).scrollHeight);
}

function getCurrentTime()
{
  var currentdate = new Date();
  var datetime = currentdate.getHours() + ":"
      + currentdate.getMinutes() + ":"
      + currentdate.getSeconds();
  return datetime;
}