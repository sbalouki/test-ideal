var token = document.querySelector('input[name="_token"]').value;

function go () {
    size = 4;

    // var params = {
    //     headers:{
    //         "content-type":"application/json;charset=UTF-8",
    //         'X-CSRF-TOKEN' : token
    //     },
    //     method:"POST"
    // }
    // return fetch("/board", params)
    //     .then((data) => {return data.json()})
}

module.exports = {
    go
}