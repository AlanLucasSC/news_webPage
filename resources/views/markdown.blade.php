@main
    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3 pb-3">
        <div class="w-md-50 bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-white overflow-hidden" style="display:inline-block;">
            <div class="text-center">
                <h2 class="display-5">Notícia</h2>
                <p class="lead">Escreva a notícia aqui. E a salve para visualizá-la.</p>
            </div>
            <div 
                class="bg-light box-shadow mx-auto pb-3" 
                style="width: 100%; min-height: 290px; border-radius: 8px 8px 8px 8px;"
            >
                <div 
                    contentEditable="true"  
                    class="pt-2 px-3 container-fluid text-secondary text-justify"
                    style="width: 100%; min-height: 290px;">
                </div>
            </div>
            <div class="text-right  pt-3 pb-3">
                <input class="button-save bg-dark text-white" type="Submit" value="Salvar">
            </div>
        </div>
        <div class="w-md-50 bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 overflow-hidden">
            <div class="text-center">
                <h2 class="display-5">Visualização</h2>
            </div>
            <div 
                class="bg-white box-shadow mx-auto" 
                style="width: 100%; height:auto; border-radius: 8px 8px 8px 8px;"
            >
                @newsTitle([
                    'title' => "What It Means to Be an Elder Orphan",
                    'subtitle' => "I’m an elderly person with no children, siblings, or parents. I need more resources to navigate major life decisions.",
                    'date' => "19/12/2018",
                    'time' => "08h44",
                    'lastUpdated' => "Atualizado há uma hora"
                ])
                @endnewsTitle
                <div class="markdown-body">
                    {!! Markdown::convertToHtml(
                        '# Installation' 
                    ) !!}
                    {!! Markdown::convertToHtml(
                        '![Laravel Markdown](https://cloud.githubusercontent.com/assets/2829600/4432292/c10da636-468c-11e4-9ed9-dac778a15cd5.PNG)' 
                    ) !!}
                    {!! Markdown::convertToHtml(
                        '## Installation' 
                    ) !!}
                </div>
            </div>
            <br>
        </div>
    </div>
@endmain
