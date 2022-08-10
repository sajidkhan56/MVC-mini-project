$(document).ready(function(){
  $("#main1 ").hide();
  $("#main2").hide();
  $("#show2").click(function(){
  $("#main").hide();
  $("#main2").hide();
  $("#main1").show();
 
 });
 $("#show3").click(function(){
  $("#main1").hide();
  $("#main2").show();
  $("#main").hide();
 
 });
 });
 
 $(function(){
 $('body').on('click', '.list-group-item', function(){
 $('.list-group-item').removeClass('active');
 $(this).closest('.list-group-item').addClass('active');
 });
 });