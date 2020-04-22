$(function() {
  let head = [];
  let elems = $('.content').children();
  let index = $('.index');
  for(let i = 2; i < elems.length - 1; i++){
    elem = elems[i];
    let elem__text = elem.innerText;
    elem.setAttribute('id', elem__text);
    if(elem.tagName == 'H2'){
      index.append('<div class="h2" data-text="' + elem__text + '"><a href="#' + elem__text + '">' + elem__text + '</a></div>');
      head.push($('#' + elem__text));
    }
    else if(elem.tagName == 'H3'){
      index.append('<div class="h3" data-text="' + elem__text + '"><a href="#' + elem__text + '">' + elem__text + '</a></div>');
      head.push($('#' + elem__text));
    }
    else if(elem.tagName == 'H4'){
      index.append('<div class="h4" data-text="' + elem__text + '"><a href="#' + elem__text + '">' + elem__text + '</a></div>');
      head.push($('#' + elem__text));
    }
  }

  let $win = $(window),
      $main = $('main'),
      $nav = $('.index'),
      navHeight = $nav.outerHeight(),
      navPos = $nav.offset().top,
      fixedClass = 'index_state_fixed';

  $win.on('load scroll', function() {
    let value = $(this).scrollTop();
    if(value > navPos){
      $nav.addClass(fixedClass);
    }
    else{
      $nav.removeClass(fixedClass);
    }
    for(let i = 0; i < head.length; i++){
      let _value = value  + window.outerHeight / 10;
      let pos = head[i].offset().top;
      if(_value > pos){
        $("[data-text = '" + head[i].text() + "']").addClass('index_state_active');
      }
      else{
        $("[data-text = '" + head[i].text() + "']").removeClass('index_state_active');
      }
    }
  });
});