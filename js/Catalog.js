(function() {
    var catalogSection = document.querySelector('.section-catalog');
    const deliveryCost = document.querySelector('.delivery-cost');
    if (catalogSection === null) {
        return;
    }

    var removeChildren = function(item) {
        while (item.firstChild) {
            item.removeChild(item.firstChild);
        }
    };

    var updateChildren = function(item, children) {
        removeChildren(item);
        for (var i = 0; i < children.length; i += 1) {
            item.appendChild(children[i]);
        }
    };

    var catalog = catalogSection.querySelector('.catalog');
    var catalogNav = catalogSection.querySelector('.catalog-nav');
    var catalogItems = catalogSection.querySelectorAll('.catalog__item');

    catalogNav.addEventListener('click', function(e) {
        var target = e.target;
        console.log(target);
        var item = myLib.closestItemByClass(target, 'catalog-nav__btn');

        if (item === null || item.classList.contains('is-active')) {
            return;
        }

        e.preventDefault();
        var filterValue = item.getAttribute('data-filter');
        var previousBtnActive = catalogNav.querySelector('.catalog-nav__btn.is-active');

        previousBtnActive.classList.remove('is-active');
        item.classList.add('is-active');

        if (filterValue === 'all') {
            updateChildren(catalog, catalogItems);
            return;
        }

        var filteredItems = [];
        for (var i = 0; i < catalogItems.length; i += 1) {
            var current = catalogItems[i];
            if (current.getAttribute('data-category') === filterValue) {
                filteredItems.push(current);
            }
        }

        updateChildren(catalog, filteredItems);
    });

    const refresCirz = () => {
        let corz = document.getElementById("corz")
        if (localStorage.length === 0) corz.innerHTML=`<div data-cart-empty id="corz" class="alert alert-secondary" role="alert">
      Корзина пуста
  </div>`
        else {
            let newcorz = ""
            for (var i = 0; i < localStorage.length; i++){

                let key = localStorage.key(i)
                let item = localStorage.getItem(key);

                newcorz += `<div>${key} в количестве: ${item}.
           <button id="butsht${i}" class="product__btn">Удалить товар</button></div>`
            }
            corz.innerHTML = newcorz;
            for (var i = 0; i < localStorage.length; i++){
                let key = localStorage.key(i)
                document.getElementById(`butsht${i}`).addEventListener('click', () => rem(key))
            }
        }
    }
    const rem = (key) => {
        localStorage.removeItem(key);
        refresCirz()
    }
    if (localStorage.length) refresCirz()
    for (let i of catalogItems) {
        i.getElementsByClassName("product__btn")[0].addEventListener('click', function(e) {
            let maxc = parseInt(i.getElementsByClassName("text-muted")[0].innerHTML.split(' '));
            let name = i.children[0].children[1].children[0].textContent;
            let count = i.getElementsByClassName("items__current")[0].innerHTML;
            count = parseInt(count)
            if (localStorage.getItem(name) === null) {
                localStorage.setItem(name, Math.min(count, maxc).toString())
            } else {
                let tcount = parseInt(localStorage.getItem(name))
                localStorage.removeItem(name)
                localStorage.setItem(name,  (Math.min(tcount+count, maxc)).toString())
            }
            refresCirz()
        });
    }
})();