( function( api ) {

	// Extends our custom "vw-book-store" section.
	api.sectionConstructor['vw-book-store'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );