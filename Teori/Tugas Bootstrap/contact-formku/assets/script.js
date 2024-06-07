$("button").click(function(event) {
    let errors = 0;
    $("form :input").map(function(){console.log($(this).val());
         if( !$(this).val()) {
              $(this).addClass('warning');
              $(this).next('.errmsg').show();
              errors++;
        } else if ($(this).val()) {
              $(this).addClass('success');
              $(this).next('.errmsg').hide();
        }   
        if($('input[type="radio"]:checked').length === 0){
            $('#radioerr').css('display','block');
        }else{
            $('#radioerr').css('display','none');
        }
        if($('input[type="checkbox"]:checked').length === 0){
            $('#checkerr').css('display','block');
        }else{
            $('#checkerr').css('display','none');
        }
    });
    
    if(errors <= 1){
        $('.success-msg').css('visibility','visible');
        $('.errmsg').css('display','none');
    }else{
        $('.success-msg').css('visibility','hidden');
    }
    event.preventDefault();

});

function showSuccess() {
    $('.success-msg').css('visibility','visible');
  }

  const radios = document.querySelectorAll('input[type="radio"]');
     radios.forEach(radio => {
         radio.onclick = () => {
            radios.forEach(radio => {
            radio.parentElement.style.backgroundColor = radio.checked ? 'var(--clr-Light-Green)' : 'var(--clr-White)';
        });
     }
  });