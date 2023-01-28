# modaler
Popups, Modal, Offcanvas, Float Sidebars for Gutenberg based web sites, by Vite &amp; Bootstrap

Popular design patterns.

Examples by Amazon, GitHub, Bootstrap https://github.com/uptimizt/modaler/labels/examples

![Popup, Modal & Offcanvas](/.github/demo.jpg)

# used 2 components from Bootstrap:

- Modal https://getbootstrap.com/docs/5.3/components/modal/
- Offcanvas https://getbootstrap.com/docs/5.3/components/offcanvas/

# design patterns
- modal and popup windows for site
- offcanvas sidebars like Amazon Navigation or Notion

# how it works?
## add layouts
- in menu - Modaler
- remember post id

## add shortcode
for exmple 
- `[modaler a=#modal-58490]` - modal render for post id 58490
- `[modaler a=#offcanvas-58490]` - offcanvas render for post id 58490

after that, you just need add hash to any link or buttons block: `<a href="#modal-58490">some link</a>` or `<a href="#offcanvas-58490">some link</a>`

## result

click on link or button and open content in modal or offcanvas
