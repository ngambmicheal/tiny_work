
$(document).ready(function()
{
	$("textarea").on('keydown',function(e){
  if (e.ctrlKey && String.fromCharCode(e.which).toLocaleLowerCase() == 'b') {
    e.preventDefault();
    var cursorPosition = $(this).prop("selectionStart");
    this.value = this.value.substr(0, cursorPosition) + '-b- -.b-' + this.value.substr(cursorPosition);
    $(this).prop("selectionStart", cursorPosition + 3);
    $(this).prop("selectionEnd", cursorPosition + 3);
  }
if (e.ctrlKey && String.fromCharCode(e.which).toLocaleLowerCase() == 'i') {
    e.preventDefault();
    var cursorPosition = $(this).prop("selectionStart");
    this.value = this.value.substr(0, cursorPosition) + '-i- -.i-' + this.value.substr(cursorPosition);
    $(this).prop("selectionStart", cursorPosition + 3);
    $(this).prop("selectionEnd", cursorPosition + 3);
  }
if (e.ctrlKey && String.fromCharCode(e.which).toLocaleLowerCase() == 'u') {
    e.preventDefault();
    var cursorPosition = $(this).prop("selectionStart");
    this.value = this.value.substr(0, cursorPosition) + '-u- -.u-' + this.value.substr(cursorPosition);
    $(this).prop("selectionStart", cursorPosition + 3);
    $(this).prop("selectionEnd", cursorPosition + 3);
  }
if (e.which==13) {
    e.preventDefault();
    var cursorPosition = $(this).prop("selectionStart");
    this.value = this.value.substr(0, cursorPosition) + '-n-' + this.value.substr(cursorPosition);
    $(this).prop("selectionStart", cursorPosition + 3);
    $(this).prop("selectionEnd", cursorPosition + 3);
  }
});
});
