/**
 * Collections Card.
 * This is a render component that deals with rendering output, but not logic or state management.
 */

/**
 * WordPress dependencies.
 */
const { __ } = wp.i18n;
const { Button } = wp.components;

export function CollectionCard( props ) {

	return (
		<>
			<div className="gb-layout-design">
				<div className="gb-layout-design-inside">
					<div className="gb-layout-design-item">
						<Button
							className="gb-layout-insert-button gb-layout-collection-button"
							isSmall
							onClick={ () => {
								props.collectionsView.setCurrentView( 'collection' );
								props.collectionsView.setCurrentCollection( props.collectionSlug );
							} }
						>
							<div className="gb-layout-collection-cover">
								<div className="gb-layout-collection-label">{ props.context.collections[props.collectionSlug].label }</div>
							</div>
							<div className="gb-layout-design-info">
								<div className="gb-layout-design-title">
									{ __( 'Browse', 'genesis-blocks' ) }
								</div>
							</div>
						</Button>
					</div>
				</div>
			</div>
		</>
	);
}