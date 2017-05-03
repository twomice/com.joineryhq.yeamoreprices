<table id="map-field-table">
    <tr class="columnheader" ><th scope="column">{ts}Contribution Label{/ts}</th><th scope="column">{ts}Amount{/ts}</th><th scope="column">{ts}Default?{/ts}<br />{$form.default.0.html}</th></tr>
    {section name=loop start=1 loop=$yeamoreprices_loop_limit}
        {assign var=idx value=$smarty.section.loop.index}
        <tr><td class="even-row">{$form.label.$idx.html}</td><td>{$form.value.$idx.html|crmMoney}</td><td class="even-row">{$form.default.$idx.html}</td></tr>
    {/section}
</table>
