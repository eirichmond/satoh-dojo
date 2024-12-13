wp.blocks.registerBlockVariation(
    "core/buttons", {
    name: "buttons-with-icon",
    title: "Buttons with icon",
    innerBlocks: [
        [
            "outermost/icon-block",
            {
                level: 3,
                placeholder: 'Heading'
            }
        ]],
});


wp.blocks.registerBlockVariation("core/group", {
	name: "group-navigation",
	title: "Group Navigation",
	icon: "menu-alt2",
	attributes: {
		align: "full",
		className: "group-navigation",
		anchor: "group-navigation",
		layout: {
			type: "constrained",
		},
	},
	innerBlocks: [
		{
			name: "core/group",
			attributes: {
				layout: {
					type: "flex",
					orientation: "horizontal",
					justifyContent: "space-between",
				},
			},
			allowedBlocks: ["core/site-logo", "core/navigation"],
			innerBlocks: [
				{
					name: "core/site-logo",
				},
				{
					name: "core/navigation",
				},
			],
		},
	],
	scope: ["inserter"],
});


