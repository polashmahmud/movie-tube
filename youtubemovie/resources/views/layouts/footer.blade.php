<div class="footer-section my-5">
  <div class="container">
    <div class="row" style="border-top: 1px solid #ddd;">
        <div class="col-md-6 py-4">@মুভি টিউব, ২০১৭ | তৈরি করেছেনঃ <a href="https://www.facebook.com/polashmahmud4" target="_blank">পলাশ মাহমুদ</a></div>
        <div class="col-md-6 py-4 text-right">হোস্টিং <a href="https://www.exonhost.com/" target="_blank">ExonHost</a></div>
    </div>
  </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src={{ asset("js/jquery-3.2.1.slim.min.js") }}></script>
<script src={{ asset("js/popper.min.js") }}></script>
<script src={{ asset("js/bootstrap.min.js") }}></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
<script>
    $(".bn").each(function(){
        $(this).text(en2bn($(this).text()));
    });
    function en2bn(input){
        var en = ["1","2","3","4","5","6","7","8","9","0",'January','th of ','Saturday','PM','AM','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','nd of','February','March','April','May','June','July','August','September','October','November','December','rd of'];
        var bn = ["১","২","৩","৪","৫","৬","৭","৮","৯","০",'জানুয়ারি', ', ','শনিবার',' ',' ','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রুবার',' ','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টবর','নভেম্বর','ডিসেম্বর',' '];
        input = input.toString();
        // use array length
        for( var i = 0; i < en.length ; i++)
        {
//                input = input.replace( en[i] , bn[i] );
            var re = new RegExp(en[i] ,'g');
            input = input.replace(re,  bn[i]);
        }
        return input;
    }
    $( document ).ready(function() {
        /*var html = $('#trns').html();
         html = en2bn(html);
         $('#trns').html(html);*/
    });
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=179776879269740';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/bn_IN/sdk.js#xfbml=1&version=v2.11&appId=209188029623971';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
@section('footer-script')
	@show

