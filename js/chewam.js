Chewam = function() {
  
  function init() {
      initPreviews();
  }
  
  function initPreviews() {
      var els = Ext.select(".preview");
      Ext.each(els.elements, animPreview);
  }
  
  function animPreview(htmlEl) {
      var images = Ext.fly(htmlEl).select("img").elements;
      var imagesCount = images.length;
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
  
  return {
      init:init
  }
    
}();

Ext.onReady(Chewam.init);
