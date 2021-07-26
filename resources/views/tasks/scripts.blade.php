<script>
    flatpickr( "#begin_date", {
        locale: "fr",
        minDate: "today",
        defaultDate: "today",
        enableTime: true,
        dateFormat: "d/m/Y à H:i"
    })

    flatpickr( "#end_date", {
        locale: "fr",
        minDate: "today",
        enableTime: true,
        dateFormat: "d/m/Y à H:i"
    })

    var config = {
        create: true,
        render: {
            no_results:function(data,escape){
                return '<div class="no-results">Aucune étiquette trouvée pour "'+escape(data.input)+'"</div>';
            },
            option_create: function(data, escape) {
                return '<div class="create">Ajouter l\'étiquette <strong>' + escape(data.input) + '</strong>&hellip;</div>';
            },
        },
        maxItems: 5
    };
    new TomSelect('#tag', config);
</script>