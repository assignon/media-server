Route = {

  backToHome: function()
  {

    Utils.hideTemplate('addEventTemplate');
    Utils.loadTemplate('calendarTemplate .agenda');

  },


  backToEvents: function()
  {

      Utils.hideTemplate('eventDetailTemplate');
      Utils.loadTemplate('displayEventTemplate');


  },

  goToEditEvent: function()
  {

    Utils.hideTemplate('displayEventTemplate');
    Utils.loadTemplate('editEventTemplate');

  },

  backToEventContent: function(from)
  {

    Utils.hideTemplate(from);
    Utils.loadTemplate('displayEventTemplate');

  },




}
