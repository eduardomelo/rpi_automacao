$('#mySwitchs input').bootstrapSwitch();

$('input[name="checktest"]').on('switchChange.bootstrapSwitch', function(event, state) {
  //console.log(this); // DOM element
  //console.log(this.id); // DOM element
  //console.log(event); // jQuery event
  //console.log(state); // true | false
  $.post("switch.php",
    {
        pin: this.id,
        status: state 
    });
});