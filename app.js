const app = Vue.createApp({

    data() {

        return {

            title: "valores diarios SII",
            valores: {},

            // valores form
            indicador: null,
            fecha: null,

        }

    },



    mounted() {
    },

    methods: {

        async extraerValores() {
            if (!this.indicador || !this.fecha) {
                alert('El indicador y la fecha son requeridos');
                return;
            }

            // Convertir la fecha de yyyy-mm-dd a dd-mm-yyyy
            const [year, month, day] = this.fecha.split('-');
            const fechaFormateada = `${day}-${month}-${year}`;

            // Validar que la fecha esté en el formato dd-mm-yyyy
            const regex = /^\d{2}-\d{2}-\d{4}$/;
            if (!regex.test(fechaFormateada)) {
                alert('La fecha debe estar en el formato dd-mm-yyyy');
                return;
            }

            const url = `https://mindicador.cl/api/${this.indicador}/${year}`;
            try {
                const response = await axios.get(url);
                this.valores = [response.data]; // Almacenar los datos en un array para manejar múltiples valores

                // Inicializar o destruir el DataTable si ya existe para actualizarlo
                if (this.table) {
                    this.table.destroy();
                }
                this.$nextTick(() => {
                    this.table = $('#datatable').DataTable(); // Inicializar el DataTable
                });
            } catch (error) {
                console.error('Error al obtener los valores:', error);
            }
        },

        formatCurrency(value) {
            // Formatear el valor como pesos chilenos
            const formatter = new Intl.NumberFormat('es-CL', {
              style: 'currency',
              currency: 'CLP'
            });
            return formatter.format(value);
        },

        formatDate(dateString) {
            // Convertir la cadena de fecha a objeto Date
            const date = new Date(dateString);
            
            // Obtener día, mes y año
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();
            
            // Construir la fecha formateada
            return `${day}-${month}-${year}`;
          }
    },


});
app.mount('#app');