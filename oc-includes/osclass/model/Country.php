<?php
/*
 *      OSCLass – software for creating and publishing online classified
 *                           advertising platforms
 *
 *                        Copyright (C) 2010 OSCLASS
 *
 *       This program is free software: you can redistribute it and/or
 *     modify it under the terms of the GNU Affero General Public License
 *     as published by the Free Software Foundation, either version 3 of
 *            the License, or (at your option) any later version.
 *
 *     This program is distributed in the hope that it will be useful, but
 *         WITHOUT ANY WARRANTY; without even the implied warranty of
 *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *             GNU Affero General Public License for more details.
 *
 *      You should have received a copy of the GNU Affero General Public
 * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class Country extends DAO {

	public static function newInstance() { return new Country(); }

	public function getTableName() { return DB_TABLE_PREFIX . 't_country'; }

	public function findByCode($code) {
		return $this->conn->osc_dbFetchResult("SELECT * FROM %s WHERE pk_c_code = '%s'", $this->getTableName(), $code);
	}

	public function listAll($language = "en_US") {
        return $this->conn->osc_dbFetchResults('SELECT * FROM %s WHERE fk_c_locale_code = \'%s\' ORDER BY s_name ASC', $this->getTableName(), $language);
	}
}

