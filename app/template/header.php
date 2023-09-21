<div layout="column" flex id="content">

    <!-- apply another layout="column" here so we only have scrolling on row content below -->
    <md-content layout="column" flex>

        <md-toolbar layout="row">
            <div class="md-toolbar-tools">
                <md-button ng-click="toggleSidenav('left')" hide-gt-sm class="md-icon-button">
                    <md-icon aria-label="Menu" md-svg-icon="https://s3-us-west-2.amazonaws.com/s.cdpn.io/68133/menu.svg"></md-icon>
                </md-button>
                <h1>Out of stock items</h1>
            </div>
        </md-toolbar>