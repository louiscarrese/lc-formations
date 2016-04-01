function preinscriptionsTableServiceFactory($filter, sharedDataService) {
    //It would deserve to factorize with sessionDetailService.titleText
    function buildSessionLibelle(item) {
        console.log(item);
        var ret = '';

        var preinscriptionSessions = item.preinscription_sessions;
        console.log(preinscriptionSessions);

        if(preinscriptionSessions != undefined && preinscriptionSessions.length > 1) {
            console.log(preinscriptionSession.length);
            ret = item.preinscription_sessions.length + ' sessions';
        } else {
            var session = preinscriptionSessions[0].session;
            console.log(session);
            ret = session.module.libelle;
            if(session.firstDate || session.lastDate) {
                ret += ' ('
                if(session.firstDate) {
                    ret += $filter('date')(session.firstDate, 'dd/MM/yyyy');
                }
                if(session.lastDate) {
                    ret += ' - ' + $filter('date')(session.lastDate, 'dd/MM/yyyy');
                }
                ret += ')';
            }
        }
        return ret;
    };

    return {
        queryParameters: function() {
        },

        deleteMessage: function() {
            var message = 'Etes vous sur de vouloir supprimer cette preinscription ?';
            return message;
        },

        getSuccess: function(data) {
            data.session_label = buildSessionLibelle(data);
        }
    };
}
