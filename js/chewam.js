Chewam = function() {

  var projectsPage = null;
  var tutorialsPage = null;
  var activePage = null;
  var pageHeight = null;
  
  function init() {
      initPreviews();
      initPaging();
  }
  
  function initPaging() {
      var pages = Ext.select(".page");
      var links = Ext.select("#menu a");
      var wrapper = Ext.get("page-wrapper");
      activePage = projectsPage = pages.elements[0];
      pageHeight = Ext.fly(activePage).getHeight();
      wrapper.setHeight(pageHeight);
      tutorialsPage = pages.elements[1];
      links.on({
          click:function(e, htmlEl, options) {
              if (htmlEl.text === "Projects" && activePage !== projectsPage) {
                  showPage(projectsPage);
                  links.toggleClass("selected");
              } else if (htmlEl.text === "Tutorials" && activePage !== tutorialsPage) {
                  showPage(tutorialsPage);
                  links.toggleClass("selected");
              }
          }
      });
  }

  function showPage(page) {
      var height = Ext.fly(page).getHeight();
      if (height > pageHeight) {
          wrapper.setHeight(height);
          pageHeight = height;
      }
      Ext.fly(activePage).slideOut("l", {
          useDisplay:true
          ,callback:function() {
              activePage = page;
              Ext.fly(page).slideIn("l", {
                  useDisplay:true
              });
          }
      });
  }
  
  function initPreviews() {
      var els = Ext.select(".preview");
      Ext.each(els.elements, animPreview);
  }
  
  function animPreview(htmlEl) {
      var images = Ext.fly(htmlEl).select("img").elements;
      var imagesCount = images.length;
      if (imagesCount) {
          var task = {
              currentIndex:0
              ,lastIndex:0
              ,interval:10000
              ,run:function() {
                  Ext.fly(images[this.lastIndex]).fadeOut({
                      useDisplay:true
                      ,scope:this
                      ,callback:function() {
                          Ext.fly(images[this.currentIndex]).fadeIn({useDisplay:true});
                          this.lastIndex = this.currentIndex;
                          this.currentIndex = this.currentIndex < imagesCount - 1 ? this.currentIndex + 1 : 0;
                      }
                  });
              }
          }
          Ext.TaskMgr.start(task);
      }
  }
  
  return {
      init:init
  }
    
}();

Ext.onReady(Chewam.init);
