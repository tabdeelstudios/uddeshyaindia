$list_elements = $('#main li');
$main_element = $('#main li.main_item');
$second_element = $('#main li.second_item');

function adjustSize() {
    
    if (window.outerWidth>=1024)
       {
        $main_el = $($main_element.get(0));
        main_wInitFirst = $main_el.width();
        main_ratio = $main_el.data('ratio');
        main_hBox = parseInt(main_wInitFirst / main_ratio);
        
        $second_el = $($second_element.get(0));
        second_wInitFirst = $second_el.width();
        second_ratio = $second_el.data('ratio');
        second_hBox = parseInt(second_wInitFirst / second_ratio);
        
        $main_element.each(function(){        
            $(this).css('height',main_hBox+'px');
        });
        
        $second_element.each(function(){        
            $(this).css('height',second_hBox+'px');
        });
       }
    else if (window.outerWidth>=768 && window.outerWidth<1024)
       {
        $main_element.each(function(){        
            $(this).css('height',435+'px');
        });
        
        $second_element.each(function(){        
            $(this).css('height',400+'px');
        });
       }
    else {
        $main_element.each(function(){        
            $(this).css('height',200+'px');
        });
        
        $second_element.each(function(){        
            $(this).css('height',180+'px');

        });

        $('#rev').css('height', 300+'px');
    }
}

function setRatio() {
       $list_elements.each(function(){        
              
        if ($(this).hasClass('main_item per_50'))
            {
              ratio = 1.6667;
            }
        
        if ($(this).hasClass('main_item per_25'))
            {
              ratio = 0.8333;  
            }
            
        if ($(this).hasClass('second_item per_50'))
            {
              ratio = 1.1851;  
            }
        
        if ($(this).hasClass('second_item per_25'))
            {
              ratio = 0.9259;  
            }        

        $(this).data('ratio', ratio);
    });
}

/* ------------------ ON RESIZE ----------------- */
$(window).resize(function() {
   adjustSize();
});

/* ------------------ ON READY ----------------- */
$(document).ready(function(){   
    setRatio();
    adjustSize();
});