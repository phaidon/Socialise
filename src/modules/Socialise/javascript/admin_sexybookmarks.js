
sections = ['group1', 'group2'];

function createLineItemSortables() {
    for (var i = 0; i < sections.length; i++) {
        Sortable.create(sections[i], {tag:'div', dropOnEmpty:true, containment:sections, only:'lineitem'});
    }
}

function destroyLineItemSortables() {
    for (var i = 0; i < sections.length; i++) {
        Sortable.destroy(sections[i]);
    }
}

function createGroupSortable() {
    Sortable.create('page', {tag:'div', only:'section', handle:'handle'});
}

function updateServices() {
    var section = document.getElementById('group2');

    var pars = "module=Socialise&func=updateServices&services="+Sortable.sequence(section);
    new Zikula.Ajax.Request(
        'ajax.php',
        {
            method: 'get',
            parameters: pars,
            onComplete: updateServices_response
        });
}

function updateServices_response(req)
{
    if (req.status != 200 ) {
        Zikula.showajaxerror(req.responseText);
        return;
    }
    var json = Zikula.dejsonize(req.responseText);
}
