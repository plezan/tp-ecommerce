function change_tab(name)
{
        document.getElementById('tab_'+old_Tab).className = 'tab';
        document.getElementById('tab_'+name).className = 'tab_on';
        document.getElementById('content_tab_'+old_Tab).style.display = 'none';
        document.getElementById('content_tab_'+name).style.display = 'block';
        old_Tab = name;
}