/**
 * Layout modal window with tab panel.
 */

import LayoutLibrary from './layout-library';

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Component, Fragment } = wp.element;
const { Button, Dashicon, Modal, TabPanel } = wp.components;

class LayoutModal extends Component {
	constructor() {
		super( ...arguments );

		this.state = {
			currentTab: 'gb-layout-tab-sections',
		};
	}

	componentDidMount() {
		this.setState( { modalOpen: true } );
	}
	render() {
		const tabs = [];
		
		if ( this.props.context.sections.length > 0 ) {
			tabs.push( {
				name: 'gb-layout-tab-sections',
				title: __( 'Sections', 'genesis-blocks' ),
				className: 'gb-layout-tab-sections',
			} );
		}
		
		if ( this.props.context.layouts.length > 0 ) {
			tabs.push( {
				name: 'gb-layout-tab-layouts',
				title: __( 'Layouts', 'genesis-blocks' ),
				className: 'gb-layout-tab-layouts',
			} );
		}

		if ( Object.keys( this.props.context.collections ).length > 0 ) {
			tabs.push( {
				name: 'gb-layout-tab-collections',
				title: __( 'Collections', 'genesis-blocks' ),
				className: 'gb-layout-tab-collections',
			} );
		}
		
		tabs.push( {
			name: 'gb-layout-tab-favorites',
			title: __( 'Favorites', 'genesis-blocks' ),
			className: 'gb-layout-tab-favorites',
		} );

		if ( this.props.context.reusableBlocks.length ) {
			tabs.push( {
				name: 'gb-layout-tab-reusable-blocks',
				title: __( 'Reusable Blocks', 'genesis-blocks' ),
				className: 'gb-layout-tab-reusable-blocks',
			} );
		}

		return (
			<Fragment key={ 'layout-modal-fragment-' + this.props.clientId }>
				{ /* Launch the layout modal window */ }
				<Button
					key={ 'layout-modal-library-button-' + this.props.clientId }
					isPrimary
					className="gb-layout-modal-button"
					onClick={ () =>
						this.setState( {
							modalOpen: true,
						} )
					}
				>
					{ __( 'Layout Library', 'genesis-blocks' ) }
				</Button>
				{ this.state.modalOpen ? (
					<Modal
						key={
							'layout-modal-modal-component-' +
							this.props.clientId
						}
						className="gb-layout-modal"
						title={ __( 'Layout Selector', 'genesis-blocks' ) }
						onRequestClose={ () =>
							this.setState( {
								modalOpen: false,
								currentTab: null,
							} )
						}
					>
						{ genesis_blocks_globals.pro_activated && (
							<div className="gb-layout-modal-footer">
								<Dashicon icon={ 'editor-help' } />
								<a
									href={
										'https://developer.wpengine.com/genesis-pro/genesis-page-builder/layouts-block/'
									}
									target="_blank"
									rel="noopener noreferrer"
								>
									{ __(
										'Add Custom Layouts',
										'genesis-blocks'
									) }
								</a>
								<span>&middot;</span>
								<a
									href={
										'https://developer.wpengine.com/genesis-pro/genesis-page-builder/reusable-blocks/'
									}
									target="_blank"
									rel="noopener noreferrer"
								>
									{ __( 'Reusable Blocks', 'genesis-blocks' ) }
								</a>
								<a
									href={
										'https://www.research.net/r/XFQYFPP'
									}
									target="_blank"
									rel="noopener noreferrer"
									className="gb-pro-feedback"
								>
									<Dashicon icon={ 'admin-comments' } />{ ' ' }
									{ __( 'Send Feedback', 'genesis-blocks' ) }
								</a>
							</div>
						) }
						<TabPanel
							key={
								'layout-modal-tabpanel-' + this.props.clientId
							}
							className="gb-layout-modal-panel"
							activeClass="gb-layout-modal-active-tab"
							onSelect={ ( tabName ) =>
								this.setState( {
									currentTab: tabName,
								} )
							}
							tabs={ tabs }
						>
							{ ( tab ) => {
								const tabContent = __(
									'Default tab content',
									'genesis-blocks'
								);

								if ( tab.name ) {
									if (
										'gb-layout-tab-sections' === tab.name
									) {
										return [
											<LayoutLibrary
												key={
													'layout-library-sections-' +
													this.props.clientId
												}
												clientId={ this.props.clientId }
												currentTab={
													this.state.currentTab
												}
												data={
													this.props.context.sections
												}
												context={ this.props.context }
											/>,
										];
									}

									if (
										'gb-layout-tab-layouts' === tab.name
									) {
										return [
											<LayoutLibrary
												key={
													'layout-library-layouts-' +
													this.props.clientId
												}
												clientId={ this.props.clientId }
												currentTab={
													this.state.currentTab
												}
												data={
													this.props.context.layouts
												}
												context={ this.props.context }
											/>,
										];
									}

									if (
										'gb-layout-tab-collections' === tab.name
									) {
										return [
											<LayoutLibrary
												key={
													'layout-library-collections-' +
													this.props.clientId
												}
												clientId={ this.props.clientId }
												currentTab={
													this.state.currentTab
												}
												data={
													this.props.context.collections
												}
												context={ this.props.context }
											/>,
										];
									}

									if (
										'gb-layout-tab-favorites' === tab.name
									) {
										return [
											<LayoutLibrary
												key={
													'layout-library-favorites-' +
													this.props.clientId
												}
												clientId={ this.props.clientId }
												currentTab={
													this.state.currentTab
												}
												data={
													this.props.context.favorites
												}
												context={ this.props.context }
											/>,
										];
									}

									if (
										'gb-layout-tab-reusable-blocks' ===
										tab.name
									) {
										return [
											<LayoutLibrary
												key={
													'layout-library-reusable-blocks-' +
													this.props.clientId
												}
												clientId={ this.props.clientId }
												currentTab={
													this.state.currentTab
												}
												data={
													this.props.context
														.reusableBlocks
												}
												context={ this.props.context }
											/>,
										];
									}
								}
								return <div>{ tabContent }</div>;
							} }
						</TabPanel>
					</Modal>
				) : null }
			</Fragment>
		);
	}
}
export default LayoutModal;
