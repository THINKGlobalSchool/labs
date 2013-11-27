<?php
/**
 * Spot Labs - requirejs foot extension
 *
 * @package SpotLabs
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jeff Tilson
 * @copyright THINK Global School 2010 - 2013
 * @link http://www.thinkglobalschool.com/
 */

$deps = require_get_depenencies();
?>
<script>
require(<?php echo json_encode($deps); ?>);
</script>
