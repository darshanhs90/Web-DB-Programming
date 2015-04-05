$(document).ready(function(){
   $('#srchname').hide();
   $('#srchlcn').hide();
   
   $('#srchGlyphlcn').click(function(){
    //alert('lcn');
    $('#srchGlyphlcn').hide(500);
    $('#srchlcn').show (500);
    $('#srchname').hide (500);
    $('#srchGlyphname').show (500);
  });
  $('#srchGlyphIconlcn').click(function(){
    //alert('lcnicon'); 
    $('#srchGlyphlcn').show(500);
    $('#srchlcn').hide(500);
  });
    $('#srchGlyphname').click(function(){
    //alert('name');
    $('#srchGlyphname').hide(500);
    $('#srchname').show (500);
    $('#srchlcn').hide (500);
    $('#srchGlyphlcn').show (500);
  });
  $('#srchGlyphIconname').click(function(){
    //alert('nameicon'); 
    $('#srchGlyphname').show(500);
    $('#srchname').hide(500);
  });
});