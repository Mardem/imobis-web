async function addTransaction(route, id) {

    const {value: typeTransaction} = await Swal.fire({
        title: 'Tipo da transação',
        input: 'select',
        inputOptions: {
            0: 'Entrada',
            1: 'Saída',
        },
        inputPlaceholder: 'Selecione um tipo',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
                return 'Você precisa selecionar algo!'
            }
        }
    })

    const {value: description} = await Swal.fire({
        title: 'Descrição da transação',
        input: 'textarea',
        inputPlaceholder: 'Descreva aqui a transação',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
                return 'Você precisa digitar algo!'
            }
        }
    })
    const {value: value} = await Swal.fire({
        title: 'Valor da transação',
        input: 'text',
        inputPlaceholder: 'Digite o valor inteiro',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
                return 'Você precisa digitar algo!'
            }
        }
    })

    if (typeTransaction !== undefined && description !== undefined && value !== undefined) {
        let data = {
            'description': description,
            'type': typeTransaction,
            'value': value,
            'lead_id': id
        };
        axios.post(route, data).then((request) => {
            let data = request.data;

            if (data.status) {
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
