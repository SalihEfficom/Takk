//swiper group
var swiper = new Swiper('.swiper-container', {
    scrollbar: {
        el: '.swiper-scrollbar',
        hide: false,
    },
    hashNavigation: {
        watchState: true,
        replaceState: true,
    },
    noSwiping: true
});
console.log('ipih');




// swiper.on('init', function () {
//     if(swiper.activeIndex == 0){
//         document.querySelector('.tabs-name  a:nth-child(1)').style.color = 'orangered';
//         document.querySelector('.tabs-name a:nth-child(2) a').style.color = 'grey';
//     }else if(swiper.activeIndex == 1){
//         document.querySelector('.tabs-name a:nth-child(1)').style.color = 'grey';
//         document.querySelector('.tabs-name a:nth-child(2)').style.color = 'orangered';
//     }
// });

// swiper.on('slideChange', function () {
//     console.log(swiper.activeIndex);
//     if(swiper.activeIndex == 0){
//         document.querySelector('.tabs-name div:nth-child(1)').style.color = 'orangered';
//         document.querySelector('.tabs-name div:nth-child(2)').style.color = 'grey';
//     }else if(swiper.activeIndex == 1){
//         document.querySelector('.tabs-name div:nth-child(1)').style.color = 'grey';
//         document.querySelector('.tabs-name div:nth-child(2)').style.color = 'orangered';
//     }
// });
document.querySelector('.tabs-name a:nth-child(1)').classList.add('activeTab');
swiper.on('slideChange', function () {
    console.log(swiper.activeIndex);
    document.querySelector('.tabs-name a:nth-child(1)').classList.toggle("activeTab");
    document.querySelector('.tabs-name a:nth-child(2)').classList.toggle("activeTab");
});

///////////////////////////////////////////////////////////////////r
window.onload = function() {
    var elements = document.getElementsByTagName('*'),
        i;
    for (i in elements) {
        if (elements[i].hasAttribute && elements[i].hasAttribute('data-include')) {
            fragment(elements[i], elements[i].getAttribute('data-include'));
        }
    }
    function fragment(el, url) {
        var localTest = /^(?:file):/,
            xmlhttp = new XMLHttpRequest(),
            status = 0;

        xmlhttp.onreadystatechange = function() {
            /* if we are on a local protocol, and we have response text, we'll assume
 *  				things were sucessful */
            if (xmlhttp.readyState == 4) {
                status = xmlhttp.status;
            }
            if (localTest.test(location.href) && xmlhttp.responseText) {
                status = 200;
            }
            if (xmlhttp.readyState == 4 && status == 200) {
                el.outerHTML = xmlhttp.responseText;
            }
        }

        try {
            xmlhttp.open("GET", url, true);
            xmlhttp.send();
        } catch(err) {
            /* todo catch error */
        }
    }
}



/////
// window.onload = function () { console.log(swiper.activeIndex) };
