mw.vidiunPluginWrapper(function(){
 
    mw.PluginManager.add( 'myComponent', mw.VBaseComponent.extend({
 
        defaultConfig: {
            parent: "controlsContainer",    // the container for the button 
            order: 41,                      // the display order ( based on layout )
            displayImportance: 'low',       // the display importance, determines when the item is removed from DOM
            align: "right",                 // the alignment of the button
            href: 'http://www.vidiun.com', // the link for the logo
            title: 'Vidiun',               // title
            img: null                       // image
        },
        getComponent: function() {
            if( !this.$el ) {
                var $img = [];
                if( this.getConfig('img') ){
                    $img = $( '<img />' )
                                .attr({
                                    alt: this.getConfig('title'),
                                    src: this.getConfig('img')
                                });
                }
                this.$el = $('<div />')
                                .addClass ( this.getCssClass() )
                                .append(
                                $( '<a />' )
                                .attr({
                                    'title': this.getConfig('title'),
                                    'target': '_blank',
                                    'href': this.getConfig('href')
                                }).append( $img )
                            );
            }
            return this.$el;
        }
    }));
 
});