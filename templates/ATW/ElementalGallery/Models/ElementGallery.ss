<section class="section section--gallery <% if $Variant %>$Variant<% end_if %>">
    <section class="section_content">
        <% if $ShowTitle %>
            <h2>$Title</h2>
        <% end_if %>
        $Text

        <div class="section_items">
            <% loop $Images %>
            <a class="item" href="$Image.FitMax(1200,1000).URL">
                $Image.Fit(100,100)
                <p>$Title</p>
            </a>
            <% end_loop %>
        </div>
    </section>
</section>
