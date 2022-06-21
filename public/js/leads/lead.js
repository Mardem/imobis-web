async function changeStatus(route, id) {

    const {value: data} = await Swal.fire({
        title: 'Alterar etapa do lead',
        input: 'select',
        inputOptions: {
            'Etapas': {
                0: 'Etapa inicial',
                1: 'Em trâmite',
                2: 'Negócio fechado',
                3: 'Cancelados',
            },
        },
        inputPlaceholder: 'Selecione um status',
        cancelButtonText: 'Cancelar',
        showCancelButton: true,
        inputValidator: (value) => {
            if (!value) {
                return 'Você precisa digitar algo!'
            }
        }
    })

    if (data) {
        const userData = {'stage': data, 'id': id};

        axios.post(route, userData).then((request) => {
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
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    }
}
