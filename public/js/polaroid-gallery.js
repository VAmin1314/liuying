var polaroidGallery = (function () {
    var dataSize = {};
    var dataLength = 0;
    var currentItem = null;
    var navbarHeight = 60;
    var resizeTimeout = null;
    var myArr = [];

    function polaroidGallery() {
        observe();

        myArr = [{"path": "../img/1.jpg", "caption": "girl-1"}, {"path": "../img/2.jpg", "caption": "girl-2"}, {"path": "../img/3.jpg", "caption": "girl-3"}, {"path": "../img/4.jpg", "caption": "girl-4"}, {"path": "../img/5.jpg", "caption": "girl-5"}, {"path": "../img/6.jpg", "caption": "girl-6"}, {"path": "../img/7.jpg", "caption": "girl-7"}, {"path": "../img/8.jpg", "caption": "girl-8"}, {"path": "../img/9.jpg", "caption": "girl-9"}, {"path": "../img/10.jpg", "caption": "girl-10"}, {"path": "../img/11.jpg", "caption": "girl-11"}, {"path": "../img/12.jpg", "caption": "girl-12"}, {"path": "../img/13.jpg", "caption": "girl-13"}, {"path": "../img/14.jpg", "caption": "girl-14"}, {"path": "../img/15.jpg", "caption": "girl-15"}];
        setGallery(myArr);

        init();
    }

    function setGallery(arr) {
        var out = "";
        var i;
        for (i = 0; i < arr.length; i++) {
            out += '<figure name="sss" id="' + i + '">' +
            '<img src="img/' + arr[i].path + '" alt="' + arr[i].path + '"/>' +
            '<figcaption>' + arr[i].caption + '</figcaption>' +
            '</figure>';
        }
        document.getElementById("gallery").innerHTML = out;
    }

    function observe() {
        var observeDOM = (function () {
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver,
            eventListenerSupported = window.addEventListener;

            return function (obj, callback) {
                if (MutationObserver) {
                    var obs = new MutationObserver(function (mutations, observer) {
                        if( mutations[0].addedNodes.length || mutations[0].removedNodes.length )
                            callback(mutations);
                    });

                    obs.observe(obj, { childList: true, subtree: false });
                }
                else if (eventListenerSupported) {
                    obj.addEventListener('DOMNodeInserted', callback, false);
                }
            }
        })();

        observeDOM(document.getElementById('gallery'), function (mutations) {
            var gallery = [].slice.call(mutations[0].addedNodes);
            var zIndex = 1;
            gallery.forEach(function (item) {
                var img = item.getElementsByTagName('img')[0];
                var first = true;
                img.addEventListener('load', function () {
                    dataSize[item.id] = {item: item, width: item.offsetWidth, height: item.offsetHeight};

                    dataLength++;

                    item.addEventListener('click', function () {
                        select(item);

                        if (!currentItem || item.id != currentItem.id) {
                            currentItem = item;
                            shuffleAll();
                        } else if (item.id == currentItem.id) {
                            showContent(item);
                        }
                    });

                    shuffle(item, zIndex++);
                })
            });
        });
    }

    function showContent (item) {
        var content = document.getElementById('content');
        var contentItem = document.getElementById('content__item');
        var url = myArr[item.id].path;

        html = '<img class="content__item-img rounded-right" src="'+url+'"> <div class="content__item-inner"> <h2>历史第一胡说</h2> <h3>感谢 Mr.Liu</h3> <p> 对于发表的第一篇，肯定要着重的说一下制作者了， 制作者简单的优点： 多才多艺 擅长沟通 适应力强 充满生命力 懂得随机应变 风趣幽默乐观 知进退，有分寸 八面玲珑，善于交际 足智多谋，反应灵敏 以及没有缺点！！！ （出门我会记得带避雷针的……） </p> </div>';
        contentItem.innerHTML = html;
        content.style.display = 'block';
    }

    function init() {
        navbarHeight = document.getElementById("nav").offsetHeight;
        navigation();

        window.addEventListener('resize', function () {
            if (resizeTimeout) {
                clearTimeout(resizeTimeout);
            }
            resizeTimeout = setTimeout(function () {
                shuffleAll();
                if (currentItem) {
                    select(currentItem);
                }
            }, 100);
        });
    }

    function select(item) {
        var scale = 1.8;
        var rotRandomD = 0;

        var initWidth = dataSize[item.id].width;
        var initHeight = dataSize[item.id].height;

        var newWidth = (initWidth * scale);
        var newHeight = initHeight * (newWidth / initWidth);

        var x = (window.innerWidth - newWidth) / 2;
        var y = (window.innerHeight - navbarHeight - newHeight) / 2;

        item.style.transformOrigin = '0 0';
        item.style.WebkitTransform = 'translate(' + x + 'px,' + y + 'px) rotate(' + rotRandomD + 'deg) scale(' + scale + ',' + scale + ')';
        item.style.msTransform = 'translate(' + x + 'px,' + y + 'px) rotate(' + rotRandomD + 'deg) scale(' + scale + ',' + scale + ')';
        item.style.transform = 'translate(' + x + 'px,' + y + 'px) rotate(' + rotRandomD + 'deg) scale(' + scale + ',' + scale + ')';
        item.style.zIndex = 999;
    }

    function shuffle(item, zIndex) {
        var randomX = Math.random();
        var randomY = Math.random();
        var maxR = 45;
        var minR = -45;
        var rotRandomD = Math.random() * (maxR - minR) + minR;
        var rotRandomR = rotRandomD * Math.PI / 180;

        var rotatedW = Math.abs(item.offsetWidth * Math.cos(rotRandomR)) + Math.abs(item.offsetHeight * Math.sin(rotRandomR));
        var rotatedH = Math.abs(item.offsetWidth * Math.sin(rotRandomR)) + Math.abs(item.offsetHeight * Math.cos(rotRandomR));

        var x = Math.floor((window.innerWidth - rotatedW) * randomX);
        var y = Math.floor((window.innerHeight - rotatedH) * randomY);

        item.style.transformOrigin = '0 0';
        item.style.WebkitTransform = 'translate(' + x + 'px,' + y + 'px) rotate(' + rotRandomD + 'deg) scale(1)';
        item.style.msTransform = 'translate(' + x + 'px,' + y + 'px) rotate(' + rotRandomD + 'deg) scale(1)';
        item.style.transform = 'translate(' + x + 'px,' + y + 'px) rotate(' + rotRandomD + 'deg) scale(1)';
        item.style.zIndex = zIndex;
    }

    function shuffleAll() {
        var zIndex = 0;
        for (var id in dataSize) {
            if (currentItem && id != currentItem.id) {
                shuffle(dataSize[id].item, zIndex++);
            }
        }
    }

    function navigation() {
        var next = document.getElementById('next');
        var preview = document.getElementById('preview');
        var close = document.getElementById('button--close');

        next.addEventListener('click', function () {
            var currentIndex = Number(currentItem.id) + 1;
            if (currentIndex >= dataLength) {
                currentIndex = 0
            }
            select(dataSize[currentIndex].item);
            shuffleAll();
        });

        preview.addEventListener('click', function () {
            var currentIndex = Number(currentItem.id) - 1;
            if (currentIndex < 0) {
                currentIndex = dataLength - 1
            }
            select(dataSize[currentIndex].item);
            shuffleAll();
        })

        close.addEventListener('click', function () {
            var content = document.getElementById('content');
            content.style.display = 'none';
        })

    }

    return polaroidGallery;
})();