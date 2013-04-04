originator-f4
=============

About 

A wordpress theme implementation of Zurb's excellent Foundation 4. 

Barebones theme. Style.css has the basic stying used on the
application. This was designed so that you can create a custom skin for
foundation 4 using their tools, then copy all the files over to this
theme, giving you the build you want and a starting point where
buttons, links, etc are all colored how you want. This is currently a
basic, functional theme.

Shortcodes

There are shortcodes for orbit and rows/columns.

To make an orbit slider simply add shortcode
[orbit][orbit_slide]<img src="img1.jpg>[/orbit_slide][orbit_slide]<img
src="img2.jpg>[/orbit_slide][/orbit]

Rows/columns work the same:
[row][column small="small-12" large="large-6"]Six columns large, 12
columns small[/columns][column small="small-12" large="large-6"]Six
columns large, 12 columns small[/columns][/row]

TODO: Omit line breaks between shortcodes in the shortcode functions - still working that out :/

TODO: Still need to iron out kinks in comments and pingbacks.

Big ups to 320Press - this uses parts from their awesome
Foundation 3 based theme, as well as Bones framework - which this also uses
(albeit somewhat poorly)!