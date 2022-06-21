async function addDetail(route, clientId){

    const { value: data } = await Swal.fire({
        title: 'Novo detalhe',
        input: 'text',
        inputLabel: 'Digite o detalhe',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
                return 'Você precisa digitar algo!'
            }
        }
    })

    if(data) {
        const userData = {'name': data, 'client_id':clientId, 'type': '0'};

        axios.post(route, userData).then((request) => {
            let data = request.data;
                if(data.status) {
                    Swal.fire({
                        position: 'center',
                        toast: true,
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500,
                        didClose: (toast) => document.location.reload()
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        toast: true,
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
        })
    }

}


async function remove(route, id) {
    axios.delete(route, {data: {'id': id}}).then((request) => {
        let data = request.data;

        if(data.status) {
            Swal.fire({
                position: 'center',
                toast: true,
                icon: 'success',
                title: data.message,
                showConfirmButton: false,
                timer: 1500,
                didClose: (toast) => document.location.reload()
            })
        } else {
            Swal.fire({
                position: 'center',
                toast: true,
                icon: 'success',
                title: data.message,
                showConfirmButton: false,
                timer: 1500
            })
        }
    })

}
