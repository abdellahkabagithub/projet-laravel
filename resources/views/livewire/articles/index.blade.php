<div>
    @if($ArticlePage == PAGECREATEFORM)
       @include("livewire.articles.create")
    @endif
    @if($ArticlePage == PAGEEDITFORM)
        @include("livewire.articles.edit")
    @endif
    @if($ArticlePage == PAGELISTE)
        @include("livewire.articles.liste")
    @endif
</div>

<script>
    window.addEventListener("showSuccessMessage", event =>{
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: event.detail.message || "Operation effectuée avec succès.",
            showConfirmButton: false,
            timer: 4000
        })
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
        Swal.fire({
            title: event.detail.message.title,
            text: event.detail.message.text,
            icon: event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, continuer!',
            cancelButtonText: 'Annuler'
            }).then((result) => {
            if (result.isConfirmed) {
                if(event.detail.message.data){
                   @this.deleteArticle(event.detail.message.data.article_id)
                }
              //  @this.deleteProp(event.detail.message.data.propriete_article_id)



            }
       })
    })
</script>
<script>
    window.addEventListener("showDangerMessage", event =>{
     Swal.fire({
        position: 'top-end',
        icon: 'warning',
        title: event.detail.message || "Operation non effectuée.",
        showConfirmButton: false,
        timer: 6000
    })
})
</script>
