/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 *
 */
import { __ } from '@wordpress/i18n';

/**
 * Registering a UI to edit Document settings.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/slotfills/plugin-document-setting-panel/
 */
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';

/**
 * The compose package is a collection of handy Hooks and Higher Order Components (HOCs) you can use to wrap your WordPress components and provide some basic features like: state, instance id, pure…
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-compose/
 */
import { compose } from '@wordpress/compose';

/**
 * Read and update post from inside the component.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-data/
 */
import { withSelect, withDispatch } from '@wordpress/data';

/**
 * Get required utilities from @wordpress/components
 */
import { TextControl, PanelBody, PanelRow } from '@wordpress/components';

/**
 * Get Image upload field.
 */
import Image  from './image-upload';

const Fields = ( { postType, postMeta, setPostMeta } ) => {

	// Do not run on other post types.
	if ( 'modaler' !== postType ) {
		return null;
	}

   return ( <PluginDocumentSettingPanel title={ __( 'Additional Information', 'company-overview') } initialOpen="true">

				<Image />
				<PanelBody>
					<PanelRow>
						<TextControl
							label={ __( 'Position in the company', 'company-overview' ) }
							value={ postMeta.position }
							onChange={ ( value ) => setPostMeta( { position: value } ) }
						/>
					</PanelRow>
				</PanelBody>

				<PluginDocumentSettingPanel title={ __( 'Social Media Links', 'company-overview') } initialOpen="true">
					<PanelBody>
						<PanelRow>
							<TextControl
								label={ __( 'Facebook', 'company-overview' ) }
								value={ postMeta.facebook }
								onChange={ ( value ) => setPostMeta( { facebook: value } ) }
							/>

						</PanelRow>
					</PanelBody>

					<PanelBody>
						<PanelRow>
							<TextControl
								label={ __( 'Github', 'company-overview' ) }
								value={ postMeta.github }
								onChange={ ( value ) => setPostMeta( { github: value } ) }
							/>
						</PanelRow>
					</PanelBody>

					<PanelBody>
						<PanelRow>
							<TextControl
								label={ __( 'LinkedIn', 'company-overview' ) }
								value={ postMeta.linkedin }
								onChange={ ( value ) => setPostMeta( { linkedin: value } ) }
							/>
						</PanelRow>
					</PanelBody>
				</PluginDocumentSettingPanel>

			</PluginDocumentSettingPanel>
		)
}

export default compose( [
	withSelect( ( select ) => {
		return {
			postMeta: select( 'core/editor' ).getEditedPostAttribute( 'meta' ),
			postType: select( 'core/editor' ).getCurrentPostType(),
		};
	} ),
	withDispatch( ( dispatch ) => {
		return {
			setPostMeta( newMeta ) {
				dispatch( 'core/editor' ).editPost( { meta: newMeta } );
			}
		};
	} )
] )( Fields );
