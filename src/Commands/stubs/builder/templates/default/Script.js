export default {

    init: function () {
        this.section = $('.BuilderNameDashes');
        if(!this.section.length) return;

        this.bindEvents();
    },

    bindEvents: function () {
        console.log('Running BuilderNameDashes');
    },
};
