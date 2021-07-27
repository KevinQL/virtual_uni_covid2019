        //FETCH MODIFICADOS
        //-----------------------------
        /**
        * 
        * @param {String} meth Que puede ser 'POST' o 'GET'
        * @param {Object} jsonData Datos que se enviarán al servidor para que sena procesados
        * @param {Function} fnRquest Aquí se tratarán los datos devueltos del servidor
        */
         function fetchKev(meth, jsonData, fnRquest, urlProcess){
            let formData = new FormData();

            formData.append("data", JSON.stringify(jsonData));

            fetch(urlProcess,{
                method: meth,
                body: formData
            }).then( data => data.json())
            .then(data => {
                fnRquest(data);
            })
        }


        /**
         * 
         * 
         * script share------------------------------------------------------------
         * script share------------------------------------------------------------
         * script share------------------------------------------------------------
         */
        function sweetModalCargando(){
            Swal.fire({
                icon: 'question',
                title: `
                    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span> 
                `,
                text: 'Espere por favor!',
                confirmButtonText: 'Cargando...',
                showCloseButton: false,
                showCancelButton: false,
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }


        /**
         * 
         * @param {*} mensaje 
         * @param {*} position 
         * @param {*} icon 
         * @param {*} timer 
         */
        function sweetModal(mensaje,position,icon,timer){
            Swal.fire({
                position,
                icon,
                title: `<small class='text-modal'>${mensaje}</small>`,
                showConfirmButton: false,
                backdrop: `
                    rgba(0,0,0,.4)
                `,
                timer
            })
        }



        /**
         * 
         * @param {*} mensaje 
         * @param {*} position 
         * @param {*} timer 
         * @param {*} icon 
         */
        function sweetModalMin(mensaje,position,timer,icon){
            const Toast = Swal.mixin({
                toast: true,
                position,
                showConfirmButton: false,
                timer,
                timerProgressBar: true,
                onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon,
                title: `<span class='my-3'>${mensaje}</span>`
            })
        }


