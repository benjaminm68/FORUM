document.querySelector('#search').addEventListener('keyup', function () {

    let input = this.value
    document.querySelector('#suggestions ul').innerHTML = ''

    if (input.length >= 1) {

        fetch('search.php?q=' + input, {
                method: 'GET',
                headers: {
                    'Content-type': 'application/json'
                }
            })

            .then(function (res) {
                console.log(res)
                return res.text()
            })

            .then(function (data) {
                let results = JSON.parse(data)
                results.forEach(function (elem) {
                    document.querySelector('#suggestions ul').innerHTML += `
                 <li id="${elem.id}">
                 <p>Name: ${elem.name}</p>
                 </li>
                 `
                })
            })
    } else {
        document.querySelector('#suggestions ul').innerHTML = ''
    }
})