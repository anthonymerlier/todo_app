<script>
    flatpickr( "#begin_date", {
        locale: "fr",
        minDate: "today",
        defaultDate: "today",
        enableTime: true,
        altInput: true,
        altFormat: "d/m/Y H:i"
    })

    flatpickr( "#end_date", {
        locale: "fr",
        minDate: "today",
        enableTime: true,
        altInput: true,
        altFormat: "d/m/Y H:i"
    })



    const tags = document.getElementById("tags");
    const items = document.getElementsByClassName("item");

    var config = {
        plugins: ['remove_button'],
        create: (input) => {
            return {value: "none", text: input}
        },
        render: {
            no_results:function(data,escape){
                return '<div class="no-results">Aucune étiquette trouvée pour "'+escape(data.input)+'"</div>';
            },
            option_create: function(data, escape) {
                return '<div class="create">Ajouter l\'étiquette <strong>' + escape(data.input) + '</strong>&hellip;</div>';
            },
        },
        maxItems: 5,
        onItemAdd: () => {
            let arrayItems = []
            for(item of items){
                console.log(items);
                arrayItems.push([ item.attributes[0].value, item.firstChild.data]);
            }
            tags.value = JSON.stringify(arrayItems); // VOIR POUR CONCATENER LES VALEURS DU TABLEAU
        },
        onItemRemove: () => {
            let arrayItems = []
            for(item of items){
                arrayItems.push([ item.attributes[0].value, item.firstChild.data]);
            }
            tags.value = JSON.stringify(arrayItems); // VOIR POUR CONCATENER LES VALEURS DU TABLEAU
        } 
    };
    
    var tomselect = new TomSelect('#tag', config);
</script>