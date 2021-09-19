    //id
    $(function(){
        $('#id').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("id").checked != true){
            document.getElementsByClassName('th__id')[0].style="display:none";
        }else  document.getElementsByClassName('th__id')[0].style="display:table-cell";
        });
      });

    //name
    $(function(){
        $('#name').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("name").checked != true){
            document.getElementsByClassName('th__name')[0].style="display:none";
        }else  document.getElementsByClassName('th__name')[0].style="display:table-cell";
        });
      });

    //number
    $(function(){
        $('#number').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("number").checked != true){
            document.getElementsByClassName('th__number')[0].style="display:none";
        }else  document.getElementsByClassName('th__number')[0].style="display:table-cell";
        });
      });

    //description
    $(function(){
        $('#description').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("description").checked != true){
            document.getElementsByClassName('th__description')[0].style="display:none";
        }else  document.getElementsByClassName('th__description')[0].style="display:table-cell";
        });
      });

    //category
    $(function(){
        $('#category').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("category").checked != true){
            document.getElementsByClassName('th__category')[0].style="display:none";
        }else  document.getElementsByClassName('th__category')[0].style="display:table-cell";
        });
      });

    //price
    $(function(){
        $('#price').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("price").checked != true){
            document.getElementsByClassName('th__price')[0].style="display:none";
        }else  document.getElementsByClassName('th__price')[0].style="display:table-cell";
        });
      });

    //kol
    $(function(){
        $('#kol').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("kol").checked != true){
            document.getElementsByClassName('th__kol')[0].style="display:none";
        }else  document.getElementsByClassName('th__kol')[0].style="display:table-cell";
        });
      });

    //status
    $(function(){
        $('#status').on('change',function(){
          $('td:nth-child('+this.name+')').toggle() //.hide()
          if(document.getElementById("status").checked != true){
            document.getElementsByClassName('th__status')[0].style="display:none";
        }else  document.getElementsByClassName('th__status')[0].style="display:table-cell";
        });
      });

    

