var count = 0;
var times = 0;

document.addEventListener('DOMContentLoaded', function () {
    var contentsList = document.getElementById('toc');
    var div = document.createElement('div');
    div.classList.add('index_wrap');

    var matches = document.querySelectorAll('.main_text h2, .main_text h3');

    matches.forEach(function (value, i) {
        var id = value.id;
        if (id === '') {
            id = value.textContent;
            value.id = id;
        }

        if(times == 0){
            var index = document.createElement('div');
            var p = document.createElement('p');
            var span = document.createElement('span');
            var img = document.createElement('img');

            index.classList.add('index_title_wrap');
            img.src = "/images/index_list.png";
            p.textContent = "目次";

            span.prepend(img);
            p.appendChild(span);
            index.appendChild(p);
            contentsList.appendChild(index);

            times += 1;
        }

        if (value.tagName === 'H2') {
            count += 1;
            var ul = document.createElement('ul');
            var li = document.createElement('li');
            var a = document.createElement('a');
            var span = document.createElement('span');

            span.textContent = count;
            ul.classList.add('h2_wrap');
            a.classList.add('main_title');
            span.classList.add('head_number');
            a.innerHTML = value.textContent;
            a.href = '#' + value.id;

            a.prepend(span);
            li.appendChild(a);
            ul.appendChild(li);
            div.appendChild(ul);
        }


        if (value.tagName === 'H3') {
            var ul = document.createElement('ul');
            var li = document.createElement('li');
            var a = document.createElement('a');
            var span = document.createElement('span');
            var img = document.createElement('img');

            var lastUl = div.lastElementChild;
            var lastLi = lastUl.lastElementChild;

            ul.classList.add('h3_wrap');
            a.classList.add('sub_title');
            span.classList.add('head_img');
            img.src = "/images/right-arrow.png";
            a.innerHTML = value.textContent;
            a.href = '#' + value.id;

            span.appendChild(img);
            a.prepend(span);
            li.appendChild(a);
            ul.appendChild(li);
            // 最後の<li>の中に要素を追加する
            lastLi.appendChild(ul);
        }
    });

    // 最後に画面にレンダリング
    contentsList.appendChild(div);
});