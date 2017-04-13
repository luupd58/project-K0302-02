function ckeditor(nameBasic = '', nameFull = '') {
  var current = this;

  this.init = function() {
    if (nameBasic) {
      current.basic(nameBasic);
    } else {
      current.full(nameFull);
    }
  }

  this.basic = function(nameBasic) {
    CKEDITOR.replace(nameBasic, {
      toolbar: [
        [ 'Bold', 'Italic', 'Format' ],
        [ 'FontSize', 'TextColor', 'BGColor' ],
        [ 'Cut', 'Copy', 'Paste', '-'],
        // [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ]
      ]
    });
  }

  this.full = function(nameFull) {
    CKEDITOR.replace(nameFull);
  }
}